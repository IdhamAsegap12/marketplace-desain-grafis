<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Transaksi;
use App\Models\Produck;
use App\Models\Download;
use App\Models\Pendapatan;
use App\Models\Keranjang;

class CallbackController extends Controller
{
    // Isi dengan private key anda
    protected $privateKey = 'IkkhE-MftiV-v5zlm-IUcR2-wtQBD';

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);



        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $invoiceId = $data->reference;
        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $invoice = Transaksi::where('reference', $invoiceId)
                ->where('reference', $tripayReference)
                ->where('status', '=', 'UNPAID')
                ->first();

            if (! $invoice) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $invoiceId,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $produckId = $invoice->produck_id;
                    $produck = Produck::find($produckId);
                    // Download produck
                    Download::create([
                        'user_id' => $invoice->user_id,
                        'produck_id' => $produck->id,
                        'image' => $produck->image,
                        'zip' => $produck->zip
                    ]);

                    // Pendapatan
                    Pendapatan::create([
                        'user_id' => $produck->user_id,
                        'produck_id' => $produck->id,
                        'jml_pendapatan' => $produck->harga
                    ]);

                    // status produck
                    $produck->update([
                        'status' => 'terjual'
                    ]);

                    // keranjang hapus
                    $keranjang = Keranjang::where('produck_id', $produckId);
                    $keranjang->delete();
                    
                    $invoice->update(['status' => 'PAID']);
                    break;

                case 'EXPIRED':
                    $invoice->update(['status' => 'UNPAID']);
                    break;

                case 'FAILED':
                    $invoice->update(['status' => 'UNPAID']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }


            return Response::json(['success' => true]);
        }
    }
}
