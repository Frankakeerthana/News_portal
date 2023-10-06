<?php

// Create an associative array with district names as keys and arrays of constituencies as values
$districtsAndConstituencies = array(
    "Adilabad" => array(
        "Adilabad",
        "Asifabad",
        "Boath",
        "Chennur",
        "Khanapur",
        "Mudhole"
    ),
    "Bhadradri Kothagudem" => array(
        "Bhadrachalam",
        "Kothagudem",
        "Aswaraopeta",
        "Pinapaka",
        "Yellandu"
    ),
    "Hyderabad" => array(
        "Malakpet",
        "Amberpet",
        "Khairatabad",
        "Jubilee Hills",
        "Secunderabad"
    ),
    "Jagtial" => array(
        "Koratla",
        "Jagtial",
        "Dharmapuri",
        "Metpally",
        "Sultanabad",
        "Husnabad"
    ),
    "Jangaon" => array(
        "Jangaon",
        "Ghanpur Station",
        "Cherial",
        "Bachannapeta"
    ),
    "Jayashankar Bhupalapally" => array(
        "Bhupalapally",
        "Mahadevpur",
        "Mulug",
        "Manthani",
        "Venkatapur",
        "Ghanpur (Mulug)"
    ),
    "Jogulamba Gadwal" => array(
        "Gadwal",
        "Alampur",
        "Wanaparthy",
        "Atmakur",
        "Siddipet"
    ),
    "Kamareddy" => array(
        "Kamareddy",
        "Nizamabad Rural",
        "Banswada",
        "Yellareddy",
        "Pitlam"
    ),
    "Karimnagar" => array(
        "Karimnagar",
        "Choppadandi",
        "Vemulawada",
        "Husnabad",
        "Huzurabad"
    ),
    "Khammam" => array(
        "Khammam",
        "Palair",
        "Madhira",
        "Wyra"
    ),
    "Komaram Bheem Asifabad" => array(
        "Sirpur",
        "Bellampalle",
        "Mancherial",
        "Chennur",
        "Mudhole"
    ),
    "Mahabubabad" => array(
        "Mahabubabad",
        "Dornakal",
        "Narsampet",
        "Parkal"
    ),
    "Mahabubnagar" => array(
        "Mahabubnagar",
        "Jadcherla",
        "Devarkadra",
        "Wanaparthy",
        "Nagarkurnool"
    ),
    "Mancherial" => array(
        "Mancherial",
        "Chennur",
        "Bellampalle",
        "Sirpur"
    ),
    "Medak" => array(
        "Siddipet",
        "Medak",
        "Narayankhed",
        "Andole",
        "Narsapur"
    ),
    "Medchal-Malkajgiri" => array(
        "Medchal",
        "Malkajgiri",
        "Quthbullapur",
        "Kukatpally"
    ),
    "Nagarkurnool" => array(
        "Nagarkurnool",
        "Achampet",
        "Kalwakurthy",
        "Kodangal"
    ),
    "Nalgonda" => array(
        "Nalgonda",
        "Suryapet",
        "Kodad",
        "Huzurnagar",
        "Miryalaguda"
    ),
    "Nirmal" => array(
        "Nirmal",
        "Bhainsa",
        "Khanapur",
        "Mudhole"
    ),
    "Nizamabad" => array(
        "Nizamabad Urban",
        "Nizamabad Rural",
        "Bodhan",
        "Armoor",
        "Nizamabad (Rural)"
    ),
    "Peddapalli" => array(
        "Peddapalle",
        "Manthani",
        "Ramagundam",
        "Sircilla"
    ),
    "Rajanna Sircilla" => array(
        "Sircilla",
        "Vemulawada",
        "Rajanna Sircilla",
        "Manakondur"
    ),
    "Rangareddy" => array(
        "Ibrahimpatnam",
        "L.B. Nagar",
        "Maheshwaram",
        "Rajendranagar",
        "Serilingampally",
        "Chevella",
        "Pargi"
    ),
    "Sangareddy" => array(
        "Sangareddy",
        "Patan",
        "Dubbak",
        "Gajwel",
        "Medak"
    ),
    "Siddipet" => array(
        "Siddipet",
        "Husnabad",
        "Medak",
        "Narayankhed",
        "Andole"
    ),
    "Suryapet" => array(
        "Suryapet",
        "Kodad",
        "Huzurnagar",
        "Nakrekal",
        "Thungathurthi"
    ),
    "Vikarabad" => array(
        "Vikarabad",
        "Tandur",
        "Parigi",
        "Chevella"
    ),
    "Wanaparthy" => array(
        "Wanaparthy",
        "Atmakur",
        "Kollapur",
        "Nagarkurnool",
        "Achampet"
    ),
    "Warangal Rural" => array(
        "Bhupalpalle",
        "Mulugu",
        "Warangal West",
        "Warangal East",
        "Ghanpur Station"
    ),
    "Warangal Urban" => array(
        "Warangal West",
        "Warangal East",
        "Waradannapet",
        "Dharmasagar",
        "Hanamkonda"
    ),
    "Yadadri Bhuvanagiri" => array(
        "Bhongir",
        "Nakrekal",
        "Thungathurthi",
        "Alair",
        "Yadagirigutta",
        "Choutuppal"
    )
);

// Create a CSV file
$csvFileName = 'telangana_districts_and_constituencies.csv';
$csvFile = fopen($csvFileName, 'w');

// Add a header row to the CSV file
fputcsv($csvFile, array('District', 'Constituencies'));

// Iterate through the data and write it to the CSV file
foreach ($districtsAndConstituencies as $district => $constituencies) {
    fputcsv($csvFile, array($district, implode(', ', $constituencies)));
}

// Close the CSV file
fclose($csvFile);

// Provide a download link to the generated CSV file
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
readfile($csvFileName);

?>
