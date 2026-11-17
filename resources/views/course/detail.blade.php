<x-layouts.app title="Course Details">

    <h1>Course Details</h1>

    <p>
        <strong>ID:</strong>
        {{ $course->id }}
    </p>

    <p>
        <strong>Course Name:</strong>
        {{ $course->name }}
    </p>

    <p>
        <strong>Course Code:</strong>
        {{ $course->code }}
    </p>

    <p>
        <strong>Description:</strong>
        {{ $course->description ?? 'No description available' }}
    </p>

    <h2>Enrolled Students</h2>

    @forelse($course->students as $student)
        <p>{{ $student->name }}</p>
    @empty
        <p>No students enrolled in this course.</p>
    @endforelse

    <a href="{{ route('courses.edit', $course) }}" class="btn">
        Edit Course
    </a>

    <a href="{{ route('courses.index') }}">
        Back to Courses
    </a>

</x-layouts.app>