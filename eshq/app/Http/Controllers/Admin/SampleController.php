<?php

// app/Http/Controllers/SampleController.php
namespace App\Http\Controllers\Admin;

use App\Models\Sample;
use App\Models\SampleDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class SampleController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('can:view_sample', ['only' => ['index', 'show', 'ajax']]);
    //     $this->middleware('can:create_sample', ['only' => ['create', 'store']]);
    //     $this->middleware('can:edit_sample', ['only' => ['edit', 'update']]);
    //     $this->middleware('can:delete_sample', ['only' => ['destroy', 'bulk_delete']]);
    // }
    
    public function index()
    {
        $samples = Sample::all();
        return view('admin.sample.index', compact('samples'));
    }
    
    public function ajax(Request $request)
    {
        $model = Sample::with('sampleDetails');

        return DataTables::eloquent($model)
            ->addColumn('action', function($sample) {
                return view('admin.sample._action', compact('sample'));
            })
            ->addColumn('bulk_checkbox', function($item) {
                return view('partials._bulk_checkbox', compact('item'));
            })
            ->toJson();
    }

    public function create()
    {
        $categories = Category::all();
    return view('admin.sample.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $sample = Sample::create($request->all());

        if ($request->has('sample_details')) {
            foreach ($request->sample_details as $sampleDetail) {
                $sample->sampleDetails()->create($sampleDetail);
            }
        }

        session()->flash('success', __('Sample created successfully'));

        return redirect()->route('admin.samples.index');
    }

    public function show($id)
    {
        $sample=Sample::find($id);
        return view('admin.sample.show', compact('sample'));
    }

    public function edit($id)
    {
        $sample=Sample::find($id);
        $categories = Category::all();
        return view('admin.sample.edit', compact('sample','categories'));
    }

    public function update(Request $request, $doc_code)
    {
        $sample = Sample::where('doc_code', $doc_code)->firstOrFail();
    
        // Update sample information
        $sample->update($request->all());
    
        // Handle sample details
        if ($request->has('sample_details')) {
            foreach ($request->sample_details as $index => $detail) {
                if (isset($detail['id'])) {
                    // Update existing sample detail
                    $sampleDetail = SampleDetail::find($detail['id']);
                    $sampleDetail->update($detail);
                } else {
                    // Create new sample detail
                    $sample->sampleDetails()->create($detail);
                }
            }
    
            // Handle deleted sample details
            if ($request->has('deleted_details')) {
                SampleDetail::whereIn('id', $request->deleted_details)->delete();
            }
        }
    
        return redirect()->route('admin.samples.index')->with('success', 'Sample updated successfully');
    }

    public function destroy($doc_code)
    {
        $sample = Sample::findOrFail($doc_code);
        $sample->sampleDetails()->delete(); // Delete related sample details
        $sample->delete(); // Delete the sample
    
        return redirect()->route('admin.samples.index')->with('success', 'Sample deleted successfully');
        }

    public function bulk_delete(BulkActionRequest $request)
    {
        // Bulk delete logic similar to TestsController

        session()->flash('success', __('Samples deleted successfully'));

        return redirect()->route('admin.samples.index');
    }
}