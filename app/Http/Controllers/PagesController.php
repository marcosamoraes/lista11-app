<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PagesController extends Controller
{
    public function __construct()
    {
        $footerCities = Company::approved()
            ->distinct()
            ->take(5)
            ->inRandomOrder()
            ->pluck('city')
            ->toArray();

        $footerCompanies = Company::approved()
            ->take(5)
            ->inRandomOrder()
            ->get();

        view()->share(compact('footerCities', 'footerCompanies'));
    }

    public function index()
    {
        $banners = Banner::where('status', true)
            ->inRandomOrder()
            ->take(2)
            ->get();

        $categories = Category::where('status', true)
            ->withCount('companies')
            ->get();

        $newCompanies = Company::approved()
            ->latest()
            ->take(8)
            ->get();

        $featuredCompanies = Company::approved()
            ->where('featured', true)
            ->take(10)
            ->get();

        $newCompanies->each(fn ($company) => $company->update(['visits' => $company->visits + 1]));
        $featuredCompanies->each(fn ($company) => $company->update(['visits' => $company->visits + 1]));
        $banners->each(fn ($banner) => $banner->update(['views' => $banner->views + 1]));

        return view('index', compact('banners', 'categories', 'newCompanies', 'featuredCompanies'));
    }

    public function listing(Request $request)
    {
        $categories = Category::where('status', true)
            ->withCount('companies')
            ->get();

        $companies = Company::approved()
            ->when($request->filled('cat'), function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->whereIn('category_id', (array) request()->cat);
                });
            })
            ->when($request->filled('city'), function ($query) {
                $query->where(function ($query) {
                    $query->orWhere('name', 'like', '%' . request()->city . '%');
                    $query->orWhere('address', 'like', '%' . request()->city . '%');
                    $query->orWhere('neighborhood', 'like', '%' . request()->city . '%');
                    $query->orWhere('city', 'like', '%' . request()->city . '%');
                    $query->orWhere('state', 'like', '%' . request()->city . '%');
                });
            })
            ->paginate(15)
            ->withQueryString();

        $companies->each(fn ($company) => $company->update(['visits' => $company->visits + 1]));

        return view('listing', compact('categories', 'companies'));
    }

    public function viewCompany(Request $request, string $city, Company $company)
    {
        if (!$company->status || !$company->is_approved) {
            Alert::toast('Empresa não encontrada.', 'error');
            return redirect()->route('index');
        }

        $company->update(['visits' => $company->visits + 1]);
        return view('view-company', compact('company'));
    }

    public function reviewCompany(Request $request, Company $company)
    {
        return view('review-company', compact('company'));
    }

    public function storeReviewCompany(Request $request, Company $company)
    {
        Review::create([
            'company_id'    => $company->id,
            'name'          => $request->name,
            'title'         => $request->title,
            'message'       => $request->message,
            'rating'        => $request->rating,
        ]);

        Alert::toast('Avaliação enviada com sucesso.', 'success');
        return redirect(route('listing.view', [$company->city, $company->slug]));
    }

    public function contactCompany(Request $request, Company $company)
    {
        $user = $company->client->user;

        Contact::create([
            'user_id'       => $user->id,
            'name'          => $request->name,
            'email'         => $request->email,
            'whatsapp'      => $request->whatsapp,
            'message'       => $request->message,
        ]);

        Alert::toast('Contato enviado com sucesso, em breve o responsável entrará em contato.', 'success');
        return back();
    }

    public function register()
    {
        return view('register');
    }

    public function contact()
    {
        return view('contact');
    }

    public function storeContact(Request $request)
    {
        Contact::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'whatsapp'      => $request->whatsapp,
            'city'          => $request->city,
            'message'       => $request->message ?? 'Empresa interessada em anunciar.',
        ]);

        Alert::toast('Contato enviado com sucesso, em breve o responsável entrará em contato.', 'success');
        return back();
    }
}
