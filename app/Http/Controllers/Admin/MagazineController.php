<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Carbon\Carbon;
use App\Models\Librarian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use File;
use App\Models\Ticket;
use App\Models\Book;
use App\Models\Magazine;
use App\Models\Distributor;
use App\Models\PublisherDistributor; 
use App\Models\Publisher;
 use Illuminate\Support\Str;
 use App\Models\Mailurl;

 
 use Illuminate\Support\Facades\Notification;
use App\Notifications\Member1detailNotification;
class MagazineController extends Controller
{

public function importFile(Request $request)
{
    try {
        $admin = auth('admin')->user();
        if ($request->hasFile('file_magazine')) {
            $file = $request->file('file_magazine');
            $fileContents = file($file->getPathname());

            // Remove the first row (header row)
            unset($fileContents[0]);

            $batchSize = 100; // Set your desired batch size

            $chunks = array_chunk($fileContents, $batchSize);

            foreach ($chunks as $chunk) {
                $librarianId = [];
                // foreach ($chunk as $line) {
                //     $data = str_getcsv($line);

                //     $librarian = Librarian::where('librarianId', $data[1])->exists();
                //     if ($librarian) {
                //         return redirect()->back()->with('errorlib', $data[1] . " already exists");
                //     }

                //     if (in_array($data[1], $librarianId)) {
                //         return redirect()->back()->with('errorlib', $data[1] . " Duplicate entry");
                //     } else {
                //         array_push($librarianId, $data[1]);
                //     }
                // }
                
                foreach ($chunk as $line) {
                    $data = str_getcsv($line);
                    $magazine = new Magazine();
                    $magazine->language = $data[0];
                    $magazine->category =$data[1];
                    $magazine->periodicity = $data[2];
                    $magazine->single_issue_rate = $data[3];
                    $magazine->annual_subscription =$data[4];
                    $magazine->discount =$data[5];
                    $magazine->single_issue_after_discount =$data[6];
                    $magazine->annual_cost_after_discount = $data[7];
                    $magazine->rni_details = $data[8];
                    $magazine->total_pages =$data[9];
                    $magazine->total_multicolour_pages =$data[10];
                    $magazine->total_monocolour_pages =$data[11];
                    $magazine->paper_quality =$data[12];
                    $magazine->magazine_size =$data[13];
                    $magazine->contact_person =$data[14];
                    $magazine->phone =$data[15];
                    $magazine->email =$data[16];
                    $magazine->address =$data[17];
                    $magazine->front_img =$data[18];
                    $magazine->back_img =$data[19];
                    $magazine->full_img =$data[20];
                    $magazine->sample_pdf =$data[21];
                    $magazine->user_type = "admin";
                    $magazine->user_id =$admin->id ;
                    $magazine->save();
                }
            }

            return redirect()->back()->with('successlib', 'File imported successfully');
        } else {
            return redirect()->back()->with('errorlib', 'No file uploaded');
        }
    } catch (\Throwable $e) {
        // Handle the exception (e.g., log it)
        return redirect()->back()->with('errorlib', 'An error occurred while importing.');
    }
}

}