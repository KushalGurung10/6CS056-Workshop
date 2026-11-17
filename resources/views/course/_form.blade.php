@php
    $course = $course ?? new \App\Models\Course();
@endphp

<x-form-input
    name="name"
    label="Course Name"
    :value="$course->name"
/>

<x-form-input
    name="code"
    label="Course Code"
    :value="$course->code"
/>

<x-form-textarea
    name="description"
    label="Description"
    :value="$course->description"
/>