<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKegiatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'program_id' => 'required|exists:programs,id',
            'kategori_kegiatan_id' => 'required|exists:kategori_kegiatans,id',
            'name' => 'required|string|max:255',
            'kecamatan' => 'nullable|exists:districts,id',
            'desa' => 'nullable|exists:villages,id',
            'pagu' => 'required',
            'nilaikontrak' => 'nullable|numeric',
            'nokontrak' => 'nullable|string|max:255',
            'tglkontrak' => 'nullable|date',
            'bataspelaksanaan' => 'nullable|integer',
            'penyedia' => 'nullable|string|max:255',
            'realisasi' => 'nullable|numeric',
            'keuangan' => 'nullable|numeric',
            'fisik' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ];
    }
}
