<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'event_date' => 'required|date|after:today',
            'return_date' => 'required|date|after:event_date',
            'event_type' => 'required|in:mariage,fiancailles,henne,soiree',
            'products' => 'required|array|min:1',
            'products.*' => 'integer|exists:products,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'city' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
            'terms' => 'required|accepted',
        ];
    }

    /**
     * Get custom messages for validation errors
     */
    public function messages(): array
    {
        return [
            'event_date.required' => 'La date de l\'événement est requise.',
            'event_date.after' => 'La date doit être après aujourd\'hui.',
            'return_date.required' => 'La date de retour est requise.',
            'return_date.after' => 'La date de retour doit être après la date de l\'événement.',
            'event_type.required' => 'Le type d\'événement est requis.',
            'products.required' => 'Veuillez sélectionner au moins un article.',
            'first_name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'phone.required' => 'Le numéro téléphone est requis.',
            'city.required' => 'La ville est requise.',
            'terms.required' => 'Vous devez accepter les conditions.',
        ];
    }
}
