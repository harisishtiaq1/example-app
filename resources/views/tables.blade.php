<!DOCTYPE html> <html> <head> <style> table { font-family: Arial, sans-serif; border-collapse: collapse; width: 100%; }
    h2 { text-align: center; } td, th { border: 1px solid #dddddd; text-align: left; padding: 8px; } tr:nth-child(even)
    { background-color: #f2f2f2; } /* Style for Update and Delete buttons */ .btn { background-color: #4CAF50; color:
    white; border: none; padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size:
    16px; border-radius: 4px; cursor: pointer; } .btn.update { background-color: #008CBA; } .btn.delete {
    background-color: #f44336; } /* Hover effect for buttons */ .btn:hover { opacity: 0.8; } /* Modal style */ .modal {
    display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto;
    background-color: rgba(0, 0, 0, 0.4); } .modal-content { background-color: #fefefe; margin: 10% auto; padding: 20px;
    border: 1px solid #888; width: 50%; } </style>
</head> <body> <h2>USER DATA</h2> <table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th> <th>Update</th> <th>Delete</th>
</tr>
@foreach ($users as $user)
<tr>
    <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        <button class="btn update"
        onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}')">Update</button>
    </td>
    <td>

        @csrf
        <a href="delete_records/{{$user->id}}">

            <button class="btn delete" type="submit">Delete</button>
        </a>
    </td>
</tr>
@endforeach
</table>

<!-- Modal -->
<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <h3>Update User</h3>
        <form action="{{ route('users.update') }}" method="post">
            @csrf
            <!-- @method('PUT') -->
            <input type="hidden" id="userId" name="userId">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <br><br>
            
            
            <button class="btn update" type="submit">Save Changes</button>
            <button class="btn delete" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>


<script>
    function openModal(id, name, email) {
        document.getElementById("userId").value = id;
        document.getElementById("name").value = name;
       // Set the user's ID in the modal
        document.getElementById("myModal").style.display = "block";
    }


    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    // Close modal when clicking outside of the modal content
    window.onclick = function (event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>

</html>