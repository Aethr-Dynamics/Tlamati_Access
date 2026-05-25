<?php

namespace App\Services;

use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisitorQrService
{
    public function generateQrFile(Visitor $visitor): string
    {
        $visitorId = $visitor->id;
        $visitorCode = $visitor->id_visitante;

        // Carpeta
        $baseDir = 'year_2026';
        $type = 'visitors';

        // Ruta:
        // year_2026/visitors/ID_VISITANTE
        $subDir = "{$type}/{$visitorCode}";

        Storage::disk('public')->makeDirectory(
            "{$baseDir}/{$subDir}",
            755,
            true
        );

        // Nombre archivo
        $filename = "QR_VISITOR_{$visitorCode}.svg";

        // Token
        $token = bin2hex(random_bytes(32));

        $hash = hash(
            'sha256',
            "{$token}_{$visitorId}_" . Carbon::now()->toIso8601String()
        );

        // Guardar en codeqrs
        DB::table('codeqrs')->insert([
            'id_student'   => null,
            'id_worker'    => null,
            'id_visitor'   => $visitorId,
            'access_token' => $token,
            'token_hash'   => $hash,
            'is_revoked'   => false,
            'qr_image'     => "{$baseDir}/{$subDir}/{$filename}",
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        // URL QR
        $qrData = "https://registroescolar.uacm.edu.mx/scan"
            . "?token={$token}"
            . "&sig=" . hash('sha256', "{$visitorId}_{$type}");

        // SVG
        $qrImage = QrCode::format('svg')
            ->size(300)
            ->color(10, 58, 86)
            ->backgroundColor(255, 255, 255)
            ->generate($qrData);

        // Guardar archivo
        Storage::disk('public')->put(
            "{$baseDir}/{$subDir}/{$filename}",
            $qrImage
        );

        return "{$baseDir}/{$subDir}/{$filename}";
    }
}