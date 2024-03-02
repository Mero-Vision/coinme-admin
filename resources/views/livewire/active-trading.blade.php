<div>
   <table class="table mt-3" wire:poll.1s>
        <thead>
            <tr>
                <th>Purchase Amount</th>
                <th>Direction</th>
                <th>Purchase Price</th>
                <th>Delivery Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trades as $data)
                <tr>
                    <td>${{ $data->purchase_amount }} USD</td>
                    @if ($data->trade_type == 'bullish')
                        <td class="bg-success text-capitalize">{{ $data->trade_type }}</td>
                    @else
                        <td class="bg-danger text-capitalize">{{ $data->trade_type }}</td>
                    @endif


                    <td>{{ $data->purchase_price }} <span class="text-capitalize">{{ $data->coin }}</span></td>
                    <td class="deliveryTimeCell">{{ $data->created_at->diffForHumans() }}</td>
                   
                </tr>
            @empty
            @endforelse


        </tbody>


    </table>
</div>
