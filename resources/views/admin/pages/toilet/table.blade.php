<table class="table table-responsive">
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>City</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Total </br> FeedBack</th>
        <th>Toilet</br>Provider</th>
        <th>Parking</th>
        <th>Sanitary</br>-Disposible-</br>Bin</th>
        <th>payment </br>-Required</th>
        <th>Verify</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($toilets as $toilet)
        <tr>
            <td>{!! $toilet->id !!}</td>
            <td>{!! $toilet->title !!}</td>
            <td>{!! $toilet->city !!}</td>
            <td>{!! $toilet->longitude !!}</td>
            <td>{!! $toilet->latitude !!}</td>
            <td><a href="{{ route('admin.toilet.show', [$toilet->id]) }}" class="btn btn-xs btn-default">{!! $toilet->feedback->count('review') !!} Feedback</a></td>
            <td>{!! $toilet->providers !!}</td>
            @if ($toilet->parking == 'Yes' || $toilet->parking == 'yes' || $toilet->parking == '1')
                <td><span class="label label-success">Yes</span></td>
            @else
                <td><span class="label label-danger">No</span></td>
            @endif

            @if ($toilet->sanitary_disposal_bin == 'Yes' || $toilet->sanitary_disposal_bin == 'yes' || $toilet->sanitary_disposal_bin == '1')
                <td><span class="label label-success">Yes</span></td>
            @else
                <td><span class="label label-danger">No</span></td>
            @endif

            @if ($toilet->payment_required == 'Yes' || $toilet->payment_required == 'yes' || $toilet->payment_required == '1')
                <td><span class="label label-success">Yes</span></td>
            @else
                <td><span class="label label-danger">No</span></td>
            @endif
            
            @if($toilet->verify == 1)
                <td>
                    <a href="{{ route('admin.verify.reject', [$toilet->id]) }}" class='btn btn-success btn-xs' title="Approved"><i class="fa fa-check"></i></a>
                </td>
            @else
                <td>
                    <a href="{{ route('admin.verify.accept', [$toilet->id]) }}" class='btn btn-danger btn-xs'><i class="fa fa-close"></i></a>
                </td>
            @endif

            <td>     
            <div class='btn-group'>
                {!! Form::open(['route' => ['admin.toilet.destroy', $toilet->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                    <a href="{!! route('admin.toilet.edit', [$toilet->id]) !!}" class='btn btn-primary btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            </td>
</tr>
@endforeach
</tbody>
</table>
