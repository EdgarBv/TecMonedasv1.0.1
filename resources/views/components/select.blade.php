@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    <option selected></option>
    <option value="ISC">Ingeniería en Sistemas Computacionales</option>
    <option value="IE">Ingeniería Electrónica</option>
    <option value="IEM">Ingeniería Electromecánica</option>
    <option value="IER">Ingeniería en Energías Renovables</option>
    <option value="II">Ingeniería Industrial</option>
</select>