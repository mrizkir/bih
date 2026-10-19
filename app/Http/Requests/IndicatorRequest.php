<?php

namespace App\Http\Requests;

use App\Support\Indicators;
use Illuminate\Foundation\Http\FormRequest;

class IndicatorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $indicator = Indicators::find($this->route('indicator'));
        $updating = $this->isMethod('put') || $this->isMethod('patch');
        $rules = [];

        foreach ($indicator['fields'] as $field) {
            if ($updating && in_array($field['name'], $indicator['primary'], true)) {
                continue;
            }

            $rules[$field['name']] = $field['rules'];
        }

        return $rules;
    }

    public function payload(): array
    {
        $indicator = Indicators::find($this->route('indicator'));
        $names = array_column($indicator['fields'], 'name');

        return $this->safe()->only($names);
    }
}
