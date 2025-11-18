<!DOCTYPE html>
<html>
<head>
    <title>Email Logs Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">

        <h1 class="text-3xl font-bold mb-6">Email Logs Dashboard</h1>

        <!-- Filters -->
        <form method="GET" class="flex gap-4 mb-6">

            <input type="text" name="search" placeholder="Search email..."
                   value="{{ request('search') }}"
                   class="p-2 border rounded w-1/3">

            <select name="event" class="p-2 border rounded">
                <option value="">All Events</option>
                <option value="clicked" {{ request('event')=='clicked' ? 'selected' : '' }}>Clicked</option>
                <option value="opened" {{ request('event')=='opened' ? 'selected' : '' }}>Opened</option>
            </select>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Filter
            </button>
        </form>

        <!-- Table -->
        <div class="bg-white shadow rounded-lg p-6">
            <table class="table-auto w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Event</th>
                        <th class="border px-4 py-2">IP Address</th>
                        <th class="border px-4 py-2">User Agent</th>
                        <th class="border px-4 py-2">Timestamp</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <td class="border px-4 py-2">{{ $log->id }}</td>
                        <td class="border px-4 py-2">{{ $log->email }}</td>
                        <td class="border px-4 py-2">{{ $log->event }}</td>
                        <td class="border px-4 py-2">{{ $log->ip }}</td>
                        <td class="border px-4 py-2 text-xs">{{ $log->user_agent }}</td>
                        <td class="border px-4 py-2">{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $logs->links() }}
        </div>
    </div>
</body>
</html>
