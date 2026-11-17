<x-layouts.app title="Courses">

    <h1>Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn">
        Create Course
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->description }}</td>

                    <td>
                        <a href="{{ route('courses.show', $course) }}">
                            View
                        </a>

                        <a href="{{ route('courses.edit', $course) }}">
                            Edit
                        </a>

                        <x-delete-form
                            :action="route('courses.destroy', $course)"
                        />
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</x-layouts.app>