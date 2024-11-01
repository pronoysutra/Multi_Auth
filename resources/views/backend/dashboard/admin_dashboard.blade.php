
 <!-- Logout Button in the Admin Dashboard -->
 <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
<h1>Admin Dashboard</h1>