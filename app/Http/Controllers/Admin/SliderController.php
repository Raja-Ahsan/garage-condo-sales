<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->get('q', ''));

        $sliders = Slider::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%');
            })
            ->ordered()
            ->paginate(12)
            ->withQueryString();

        return view('screens.admin.sliders.index', compact('sliders', 'search'));
    }

    public function create(): View
    {
        return view('screens.admin.sliders.create');
    }

    public function store(StoreSliderRequest $request): RedirectResponse
    {
        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->input('title'),
            'image' => $path,
            'sort_order' => (int) $request->input('sort_order', 0),
            'status' => $request->input('status', 'active'),
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    public function edit(Slider $slider): View
    {
        return view('screens.admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, Slider $slider): RedirectResponse
    {
        $data = [
            'title' => $request->input('title'),
            'sort_order' => (int) $request->input('sort_order', 0),
            'status' => $request->input('status', 'active'),
        ];

        if ($request->hasFile('image')) {
            $slider->deleteStoredImage();
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }

        $slider->update($data);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->deleteStoredImage();
        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
