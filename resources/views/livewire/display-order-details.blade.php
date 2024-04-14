<div>
    <h1>Your Orders</h1>

    @foreach ($orders as $order)
        <div>
            <p>Order ID: {{ $order->id }}</p>
            <!-- Display other order details here -->
        </div>
    @endforeach
</div>
