@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    <option selected></option>
    <option value="isc">Ingeniería en Sistemas Computacionales</option>
    <option value="ie">Ingeniería Electrónica</option>
    <option value="iem">Ingeniería Electromecánica</option>
    <option value="ier">Ingeniería en Energías Renovables</option>
    <option value="ii">Ingeniería Industrial</option>
</select>