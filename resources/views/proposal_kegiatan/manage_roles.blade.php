@extends('proposal_kegiatan/reviewer')
@section('title', 'Manage Roles')
@section('konten')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS is already included at the bottom of the page -->

<body>


    <div class="bg-white rounded-2xl shadow-lg mb-8 p-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Manage Roles
                </h1>
                <p class="text-gray-500">Kelola semua Role</p>
            </div>
        </div>
    </div>



    <div class="container mt-5">
        <ul class="nav nav-tabs" id="roleTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pengaju-tab" data-bs-toggle="tab" data-bs-target="#pengaju" type="button" role="tab" aria-controls="pengaju" aria-selected="true">Pengaju</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviewer-tab" data-bs-toggle="tab" data-bs-target="#reviewer" type="button" role="tab" aria-controls="reviewer" aria-selected="false">Reviewer</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="roleTabsContent">
            <!-- Tab Pengaju -->
            <div class="tab-pane fade show active" id="pengaju" role="tabpanel" aria-labelledby="pengaju-tab">
                <!-- Tombol Tambah -->
                <div class="d-flex justify-content-end mb-3">
                    
                    <div class="bg-white rounded-2xl shadow-lg mb-8 p-3">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                            <div class="space-y-2">
                                <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    Pengaju
                                </h1>
                            </div>
                            <a href="{{ route('create.pengaju') }}"
                                class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:rotate-90 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">No</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">Username</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">Email</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">Ormawa</th>
                                            <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($pengajus as $pengaju)
                                        <tr data-id="{{ $pengaju->id }}" class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 text-sm text-gray-800">{{ $i++ }}</td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $pengaju->username }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pengaju->email }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $pengaju->ormawa->nama_ormawa }}</td>
                                            <td class="px-6 py-4 text-center">
                                                <a href="{{ route('edit.pengaju', $pengaju->id) }}" 
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </a>
                                                <button type="button" 
                                                   class="reset-pengaju-btn inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors duration-200 ml-2"
                                                   data-bs-toggle="modal" 
                                                   data-bs-target="#resetPengajuModal"
                                                   data-id="{{ $pengaju->id }}"
                                                   data-username="{{ $pengaju->username }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                                    </svg>
                                                    Reset Password
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- Tab Reviewer -->
            <div class="tab-pane fade" id="reviewer" role="tabpanel" aria-labelledby="reviewer-tab">
                <!-- Tombol Tambah -->
                <div class="d-flex justify-content-end mb-3">
                    <div class="bg-white rounded-2xl shadow-lg mb-8 p-3">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                            <div class="space-y-2">
                                <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    Reviewer
                                </h1>
                            </div>
                            <a href="{{ route('create.reviewer') }}"
                                class="flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:rotate-90 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">No</th>
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">Username</th>
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left">Email</th>
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left"> Role</th>
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-left"> Ormawa</th>
                                    <th class="px-6 py-4 text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($reviewers as $reviewer)
                                <tr data-id="{{ $reviewer->id }}" class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 text-sm text-gray-800">{{ $i++ }}</td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $reviewer->username }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $reviewer->email }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $reviewer->role->role }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $reviewer->ormawa->nama_ormawa }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('edit.reviewer', $reviewer->id) }}" 
                                           class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <button type="button" 
                                           class="reset-reviewer-btn inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-700 rounded-lg hover:bg-yellow-100 transition-colors duration-200 ml-2"
                                           data-bs-toggle="modal" 
                                           data-bs-target="#resetReviewerModal"
                                           data-id="{{ $reviewer->id }}"
                                           data-username="{{ $reviewer->username }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                            </svg>
                                            Reset Password
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Reset Password Modal for Pengaju -->
    <div class="modal fade" id="resetPengajuModal" tabindex="-1" aria-labelledby="resetPengajuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetPengajuModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500 mb-6">
                        Reset password untuk user <span id="pengajuUsernameDisplay" class="font-bold"></span>
                    </p>
                    <form id="resetPengajuForm" method="POST" action="">
                        @csrf
                        <div class="mb-4">
                            <label for="pengaju_password" class="form-label">Password Baru</label>
                            <input type="password" name="password" id="pengaju_password" class="form-control" required minlength="8">
                        </div>
                        <div class="mb-4">
                            <label for="pengaju_password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="pengaju_password_confirmation" class="form-control" required minlength="8">
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal for Reviewer -->
    <div class="modal fade" id="resetReviewerModal" tabindex="-1" aria-labelledby="resetReviewerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetReviewerModalLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500 mb-6">
                        Reset password untuk user <span id="reviewerUsernameDisplay" class="font-bold"></span>
                    </p>
                    <form id="resetReviewerForm" method="POST" action="">
                        @csrf
                        <div class="mb-4">
                            <label for="reviewer_password" class="form-label">Password Baru</label>
                            <input type="password" name="password" id="reviewer_password" class="form-control" required minlength="8">
                        </div>
                        <div class="mb-4">
                            <label for="reviewer_password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="reviewer_password_confirmation" class="form-control" required minlength="8">
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tabEl = document.querySelector('a[data-bs-toggle="tab"]')
            tabEl && tabEl.addEventListener('shown.bs.tab', function (event) {
                // Tab changed event if needed
            });
            
            // Debug output to verify functions are accessible
            console.log('DOM Content Loaded');
            
            // Verify Bootstrap is available
            if (typeof bootstrap !== 'undefined') {
                console.log('Bootstrap is available');
            } else {
                console.error('Bootstrap is not available. Modal functionality will not work.');
            }
            
            // Set up event listeners for modals
            var resetPengajuModal = document.getElementById('resetPengajuModal');
            resetPengajuModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                
                // Extract info from data-* attributes
                var id = button.getAttribute('data-id');
                var username = button.getAttribute('data-username');
                
                console.log('Pengaju modal show event - ID:', id, 'Username:', username);
                
                // Update the modal's content
                var modalTitle = resetPengajuModal.querySelector('.modal-title');
                var usernameSpan = document.getElementById('pengajuUsernameDisplay');
                var form = document.getElementById('resetPengajuForm');
                
                modalTitle.textContent = 'Reset Password';
                usernameSpan.textContent = username;
                form.action = "{{ url('/reset-password-pengaju') }}/" + id;
            });
            
            var resetReviewerModal = document.getElementById('resetReviewerModal');
            resetReviewerModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                
                // Extract info from data-* attributes
                var id = button.getAttribute('data-id');
                var username = button.getAttribute('data-username');
                
                console.log('Reviewer modal show event - ID:', id, 'Username:', username);
                
                // Update the modal's content
                var modalTitle = resetReviewerModal.querySelector('.modal-title');
                var usernameSpan = document.getElementById('reviewerUsernameDisplay');
                var form = document.getElementById('resetReviewerForm');
                
                modalTitle.textContent = 'Reset Password';
                usernameSpan.textContent = username;
                form.action = "{{ url('/reset-password-reviewer') }}/" + id;
            });
        });
    </script>
</body>
@endsection
