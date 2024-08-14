@extends('layouts.app')

@section('title')
  {{ __('Documents') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Documents') }}</h3>
                    @can('create', Document::class)
                        <a href="{{ route('documents.create') }}" class="btn btn-primary float-right">{{ __('Create New') }}</a>
                    @endcan
                </div>
                <div class="card-body">
                    @if (count($documents) > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Description') }}</th>
                                    <th>{{ __('Version') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th width="100px" class="text-center">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents ?? '' as $document)
                                    <tr>
                                        <td>{{ $document->title }}</td>
                                        <td>{{ $document->description }}</td>
                                        <td>{{ $document->version }}</td>
                                        <td>{{ $document->status }}</td>
                                        <td class="text-center">
                                            @can('view', $document)
                                                <a href="{{ route('documents.show', $document->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            @endcan
                                            @can('update', $document)
                                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('delete', $document)
                                                <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this document?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">No documents found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
