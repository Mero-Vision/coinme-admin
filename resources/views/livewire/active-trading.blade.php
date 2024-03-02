<div>
    <table class="table mt-3" wire:poll.1s>
        <thead class="bg-primary text-light">
            <tr>
                <th>Client Name</th>
                <th>Purchase Amount</th>
                <th>Direction</th>
                <th>Purchase Price</th>
                <th>Delivery Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trades as $data)
                <tr>
                    <td>{{ $data->name }}</td>
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
               
                    <tr>
                        <td colspan="5">
                            <img src="{{ url('assets/img/Empty-rafiki.png') }}" class="img-fluid d-block mx-auto"
                                style="width: 30%" />
                        </td>
                    </tr>
               
                @endforelse


            </tbody>


        </table>
    </div>
