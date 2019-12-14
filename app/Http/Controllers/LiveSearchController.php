<?php

namespace App\Http\Controllers;

use App\BaiHatMoi;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    public function index()
    {
        $baihat = BaiHatMoi::get();

        return view('search', compact('baihat'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $baihat = Baihatmoi::where('tenbaihat', 'LIKE', '%' . $request->search . '%')->get();
            if ($baihat) {
                foreach ($baihat as $key => $baihat) {
                    $output .= '<tr>
                    <td>' . $baihat->tenbaihat . '</td>
                    </tr>';
                }
            }
            return Response($output)->header('Content-Type', 'Header Value');
        }
    }
}
