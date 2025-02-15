<?php

namespace App\Http\Requests\article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['image', 'nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'isComment' => ['required'],
            'isSharable' => ['required'],
            'isActive' => ['required'],
            'category_id' => ['required'],
            'tags' => ['string', 'nullable']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne doit pas dépasser 255 caractères.',

            'description.required' => 'La description est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',

            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format PNG, JPG ou JPEG.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',

            'isComment' => 'La valeur de "Commentable" est invalide.',
            'isSharable' => 'La valeur de "Partageable" est invalide.',
            'isActive' => 'La valeur de "Actif" est invalide.',

            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',

        ];
    }
}
