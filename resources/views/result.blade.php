@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>Clustering Result</h1>
        @foreach ($clusters as $clusterIndex => $cluster)
            <h2>Cluster {{ $clusterIndex + 1 }}</h2>
            @if (!empty($cluster) && is_array($cluster))
                <div class="table-responsive">
                    <table id="datatable-{{ $clusterIndex }}" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                @if (!empty($cluster[0]) && is_array($cluster[0]))
                                    @foreach (array_keys($cluster[0]) as $key)
                                        <th>Feature {{ $key + 1 }}</th>
                                    @endforeach
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cluster as $sample)
                                <tr>
                                    @foreach ($sample as $value)
                                        <td>{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>No data available in this cluster.</p>
            @endif
        @endforeach

    </div>
@endsection

@section('scripts')
    @foreach ($clusters as $clusterIndex => $cluster)
        @if (count($cluster) > 0)
            <script>
                $(document).ready(function() {
                    $('#datatable-{{ $clusterIndex }}').DataTable({
                        responsive: true,
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>
        @endif
    @endforeach
@endsection
