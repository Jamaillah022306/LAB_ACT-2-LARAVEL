<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Registrations</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Fraunces:wght@700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --teal: #2a9d8f;
            --teal-dark: #21867a;
            --teal-light: #e8f7f5;
            --gold: #e9c46a;
            --red: #ef4444;
            --red-light: #fee2e2;
            --blue: #3b82f6;
            --blue-light: #eff6ff;
            --text: #1a1a2e;
            --muted: #6b7280;
            --bg: #f7f9f4;
            --white: #ffffff;
            --border: #e5e7eb;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 2.5rem;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            color: var(--teal);
            text-decoration: none;
        }

        .btn-outline {
            padding: 0.5rem 1.2rem;
            border: 1.5px solid var(--teal);
            border-radius: 8px;
            color: var(--teal);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-outline:hover {
            background: var(--teal);
            color: var(--white);
        }

        main {
            flex: 1;
            padding: 3rem 2rem;
            max-width: 1000px;
            margin: 0 auto;
            width: 100%;
        }

        .page-header { margin-bottom: 2rem; }

        .page-header h1 {
            font-family: 'Fraunces', serif;
            font-size: 2rem;
            color: var(--text);
        }

        .page-header p {
            color: var(--muted);
            font-size: 0.95rem;
            margin-top: 0.3rem;
        }

        .divider {
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--gold));
            border-radius: 2px;
            margin-bottom: 2rem;
        }

        .count-badge {
            display: inline-block;
            background: var(--teal-light);
            color: var(--teal-dark);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            margin-top: 0.5rem;
        }

        .table-wrap {
            background: var(--white);
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            overflow: hidden;
            animation: fadeUp 0.4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        table { width: 100%; border-collapse: collapse; }

        thead { background: var(--teal); color: var(--white); }

        thead th {
            padding: 1rem 1.2rem;
            text-align: left;
            font-size: 0.82rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }

        tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background 0.15s ease;
        }

        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: var(--teal-light); }

        tbody td {
            padding: 1rem 1.2rem;
            font-size: 0.93rem;
            color: var(--text);
        }

        tbody td.muted { color: var(--muted); font-size: 0.85rem; }

        .course-badge {
            display: inline-block;
            background: var(--teal-light);
            color: var(--teal-dark);
            font-size: 0.8rem;
            font-weight: 600;
            padding: 0.2rem 0.65rem;
            border-radius: 6px;
        }

        .action-btns { display: flex; gap: 0.5rem; }

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.35rem 0.8rem;
            background: var(--blue-light);
            color: var(--blue);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-edit:hover { background: var(--blue); color: var(--white); }

        .btn-delete {
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            padding: 0.35rem 0.8rem;
            background: var(--red-light);
            color: var(--red);
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-delete:hover { background: var(--red); color: var(--white); }

        .empty {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--muted);
        }

        .empty svg {
            width: 48px; height: 48px;
            stroke: var(--border);
            fill: none; stroke-width: 1.5;
            margin-bottom: 1rem;
        }

        /* MODALS */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.4);
            z-index: 200;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay.active { display: flex; }

        .modal {
            background: var(--white);
            border-radius: 16px;
            padding: 2rem;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            animation: fadeUp 0.3s ease both;
        }

        .modal h2 {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }

        .modal p { color: var(--muted); font-size: 0.9rem; margin-bottom: 1.5rem; }

        .form-group { margin-bottom: 1rem; }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 0.4rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--text);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus { border-color: var(--teal); }

        .modal-actions {
            display: flex;
            gap: 0.75rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .btn-cancel {
            padding: 0.6rem 1.2rem;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            background: transparent;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-cancel:hover { background: var(--bg); }

        .btn-save {
            padding: 0.6rem 1.4rem;
            background: var(--teal);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-save:hover { background: var(--teal-dark); }

        .btn-confirm-delete {
            padding: 0.6rem 1.4rem;
            background: var(--red);
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-confirm-delete:hover { background: #dc2626; }

        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.82rem;
            color: var(--muted);
            border-top: 1px solid var(--border);
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">EduRegister</a>
        <a href="{{ route('home') }}" class="btn-outline">Back to Home</a>
    </nav>

    <main>
        <div class="page-header">
            <h1>Registered Students</h1>
            <p>All submitted registration entries.</p>
            <span class="count-badge">{{ $registrations->count() }} {{ Str::plural('student', $registrations->count()) }}</span>
        </div>

        <div class="divider"></div>

        <div class="table-wrap">
            @if($registrations->isEmpty())
                <div class="empty">
                    <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <p>No registrations yet.</p>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Course</th>
                            <th>Registered</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $reg)
                        <tr>
                            <td class="muted">{{ $loop->iteration }}</td>
                            <td><strong>{{ $reg->full_name }}</strong></td>
                            <td class="muted">{{ $reg->email }}</td>
                            <td>{{ $reg->age }}</td>
                            <td><span class="course-badge">{{ $reg->course }}</span></td>
                            <td class="muted">{{ $reg->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-btns">
                                    <button class="btn-edit" onclick="openEdit({{ $reg->id }}, '{{ addslashes($reg->full_name) }}', '{{ addslashes($reg->email) }}', {{ $reg->age }}, '{{ $reg->course }}')">
                                        Edit
                                    </button>
                                    <button class="btn-delete" onclick="openDelete({{ $reg->id }}, '{{ addslashes($reg->full_name) }}')">
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </main>

    <!-- EDIT MODAL -->
    <div class="modal-overlay" id="editModal">
        <div class="modal">
            <h2>Edit Registration</h2>
            <p>Update the student's information below.</p>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" id="edit_full_name" required minlength="3" maxlength="100">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" id="edit_email" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" id="edit_age" min="18" max="100" required>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <select name="course" id="edit_course" required>
                        <option value="BSIT">BSIT</option>
                        <option value="BSCS">BSCS</option>
                        <option value="BSIS">BSIS</option>
                        <option value="BSCE">BSCE</option>
                        <option value="BSN">BSN</option>
                        <option value="BSED">BSED</option>
                        <option value="BSBA">BSBA</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeModals()">Cancel</button>
                    <button type="submit" class="btn-save">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal-overlay" id="deleteModal">
        <div class="modal">
            <h2>Delete Registration</h2>
            <p id="deleteMessage"></p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" onclick="closeModals()">Cancel</button>
                    <button type="submit" class="btn-confirm-delete">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        © 2026 EduRegister · Built with Laravel &amp; Blade Templates
    </footer>

    <script>
        function openEdit(id, full_name, email, age, course) {
            document.getElementById('editForm').action = '/registrations/' + id;
            document.getElementById('edit_full_name').value = full_name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_age').value = age;
            document.getElementById('edit_course').value = course;
            document.getElementById('editModal').classList.add('active');
        }

        function openDelete(id, name) {
            document.getElementById('deleteForm').action = '/registrations/' + id;
            document.getElementById('deleteMessage').textContent = 'Are you sure you want to delete "' + name + '"? This cannot be undone.';
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeModals() {
            document.getElementById('editModal').classList.remove('active');
            document.getElementById('deleteModal').classList.remove('active');
        }

        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) closeModals();
            });
        });
    </script>

</body>
</html>