@include('admin.AdminPage')
<div class="w-5/6 flex justify-center items-center">
        <form id="table" class="w-4/5 flex flex-col justify-center text-center" method="post">
            <h1 class="text-xl mb-8 text-white">Orders</h1>
            @csrf
            @method('DELETE')

            @if (isset($orders))
            <table class="text-white table-auto">
                <thead class="border-b-2 border-primary-50">
                    <tr>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left hidden delCheck">Box</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">No.</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">User</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Order Opened</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Order Closed</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Status</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Created at</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Updated at</th>
                        <th class="p-4 text-sm font-semibold tracking-wide text-left">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="hidden delCheck">
                            <input type="checkbox" name="row=ids[]" value="{{ $order->id }}">
                        </td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->OrderOpen }}</td>
                        <td>{{ $order->OrderClosed }}</td>
                        <td>{{ $order->Status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->updated_at }}</td>
                        <td><a href="{{ route('Admin.Orders.Invoice', ['orderId' => $order->id]) }}" target="_blank">Show</a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
            @else
            <h2>No Orders in Database</h2>
            @endif
            <div>
                
                @if(session('success'))
                    <p class="text-white">{{ session('success') }}</p>
                @endif
                @if(session('fail'))
                    <p class="text-white">{{ session('fail') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
