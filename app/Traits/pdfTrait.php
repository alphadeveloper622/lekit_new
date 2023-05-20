<?php

namespace App\Traits;

use App\Models\Font;

trait pdfTrait{
    private function setFont(): array
    {

        $pdf_font = Font::where('status', 1)->first();

        $font_name = @$pdf_font->local;

        $font_data = config('pdf.font_data');
        if ($font_name) {
            $new_font = [
                $font_name => [
                    "R" => @$pdf_font->regular,
                    "I" => @$pdf_font->medium,
                    "B" => @$pdf_font->bold,
                    "useOTL" => 255,
                    "useKashida" => 75,
                ],
            ];
            config(['pdf.font_data' => $new_font]);
        }
        $fonts = config('pdf.font_data');
        return [
            'pdf_font' => $pdf_font,
            'fonts' => $fonts,
        ];
    }

    public function commonSetting(): string
    {
        $set_fonts = $this->setFont();

        $font = $set_fonts['pdf_font'];

        if ($font) {
            $font_name = @$font->local;
        } else {
            $font_name = 'en';
        }
        return $font_name;
    }
}
