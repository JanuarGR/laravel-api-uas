<?php

namespace App\Models;

use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Odt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_odt',
        'tipe_odt',
        'harga_odt',
    ];
    /**
     * Aturan validasi untuk model ini.
     *
     * @return array
     */
    public static function rules($process)
    {
        if ($process == 'insert') {
            return [
                'nama_odt' => 'required|string',
                'tipe_odt' => 'required|string',
                'harga_odt' => 'required|integer',
            ];
        } elseif ($process == 'update') {
            return [
                'nama_odt' => 'required|string',
                'tipe_odt' => 'required|string',
                'harga_odt' => 'required|integer',
            ];
        }
    }

    /**
     * Mendaftarkan aturan validasi kustom.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public static function customValidation(Validator $validator)
    {
        $customAttributes = [
            'nama_odt' => 'Nama Odt',
                'tipe_odt' => 'Tipe Odt',
                'harga_odt' => 'Harga Odt',
        ];
        $validator->addReplacer('required', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus diisi.');
        });

        $validator->addReplacer('string', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
            return str_replace(':attribute', $customAttributes[$attribute], ':attribute harus berupa string.');
        });

        // $validator->addReplacer('max', function ($message, $attribute, $rule, $parameters) use ($customAttributes) {
        //     return str_replace(':attribute', $customAttributes[$attribute], ':attribute tidak boleh lebih dari ' . $parameters[0] . ' karakter.');
        // });
    }
}
