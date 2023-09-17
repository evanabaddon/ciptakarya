<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKegiatanRequest extends FormRequest
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
            'program_id' => 'required',
            'kategori_kegiatan_id' => 'required',
            'sub_kegiatan_id' => 'required',
            'name' => 'required',
            'desa' => 'nullable',
            'kecamatan' => 'nullable',
            'pagu' => 'nullable|numeric',
            'nilaikontrak' => 'nullable|numeric',
            'nokontrak' => 'nullable',
            'tglkontrak' => 'nullable|date',
            'bataspelaksanaan' => 'nullable|numeric',
            'penyedia' => 'nullable',
            'realisasi' => 'nullable|numeric',
            'keuangan' => 'nullable|numeric',
            'fisik' => 'nullable|numeric',
            'keterangan' => 'nullable',
        ];
    }
}
