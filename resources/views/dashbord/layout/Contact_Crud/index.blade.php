@extends("dashbord.masterpage")


@section("content")







<table style="width: 80%; margin: auto; border-collapse: collapse; text-align: left; font-family: Arial, sans-serif; border: 1px solid #ddd;">
    <thead style="background-color: black;">
        <tr>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">#</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Name</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Email</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Message</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Reply</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Status</th>
            <th style="padding: 10px; border: 1px solid #ddd; color: #fff;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $contact->id }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $contact->name }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $contact->email }}</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $contact->message }}</td>

                {{-- عرض نص الرد هنا --}}
                <td style="padding: 10px; border: 1px solid #ddd;">
                    @if($contact->status == 'replied')
                        <span>{{ $contact->reply_message }}</span>
                    @else
                        <span style="color: gray;">No reply yet</span>
                    @endif
                </td>

                <td style="padding: 10px; border: 1px solid #ddd;">
                    <span style="color: {{ $contact->status === 'replied' ? 'green' : 'orange' }}">
                        {{ ucfirst($contact->status) }}
                    </span>
                </td>

                <td style="padding: 10px; border: 1px solid #ddd; display: flex; gap: 5px;">
                    {{-- زر حذف --}}
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc3545; color: white; padding: 6px 12px; border-radius: 5px;">Delete</button>
                    </form>

                    {{-- زر Reply --}}
                    @if($contact->status == 'pending')
                        <button type="button" data-bs-toggle="modal" data-bs-target="#replyModal{{ $contact->id }}"
                                style="background-color: #007bff; color: white; padding: 6px 12px; border-radius: 5px;">
                            Reply
                        </button>
                    @endif
                </td>
            </tr>

            {{-- Modal --}}
            <div class="modal fade" id="replyModal{{ $contact->id }}" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Reply to {{ $contact->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="mb-3">
                              <label>Reply Message:</label>
                              <textarea name="reply_message" class="form-control" required>{{ $contact->reply_message }}</textarea>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        @endforeach
    </tbody>
</table>



@endsection







