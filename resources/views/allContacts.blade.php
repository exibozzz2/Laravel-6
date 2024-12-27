@extends("layout")

@section("pageTitle")
All Contacts
@endsection


@section("content")
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Operations</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <a href="/admin/delete-contact/{{ $contact->id }}" class="btn btn-danger">Delete</a>
                    <a href="{{ route('editContact', ['contact' => $contact->id]) }}" class="btn btn-info">Edit</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


@endsection
