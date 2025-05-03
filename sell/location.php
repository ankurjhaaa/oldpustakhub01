<?php if(!isset($_SESSION['email'])){
    echo '<script>window.history.back();</script>';
} ?>
<div class=" rounded shadow w-full ">
  <!-- State -->
  <div>
    <label class="block text-sm font-semibold mb-1">State *</label>
    <select id="state" name="state" class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]" onchange="showDistricts()">
      <option value="">Select State</option>
      <option value="Andhra Pradesh">Andhra Pradesh</option>
      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
      <option value="Assam">Assam</option>
      <option value="Bihar">Bihar</option>
      <option value="Chhattisgarh">Chhattisgarh</option>
      <option value="Goa">Goa</option>
      <option value="Gujarat">Gujarat</option>
      <option value="Haryana">Haryana</option>
      <option value="Himachal Pradesh">Himachal Pradesh</option>
      <option value="Jharkhand">Jharkhand</option>
      <option value="Karnataka">Karnataka</option>
      <option value="Kerala">Kerala</option>
      <option value="Madhya Pradesh">Madhya Pradesh</option>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Manipur">Manipur</option>
      <option value="Meghalaya">Meghalaya</option>
      <option value="Mizoram">Mizoram</option>
      <option value="Nagaland">Nagaland</option>
      <option value="Odisha">Odisha</option>
      <option value="Punjab">Punjab</option>
      <option value="Rajasthan">Rajasthan</option>
      <option value="Sikkim">Sikkim</option>
      <option value="Tamil Nadu">Tamil Nadu</option>
      <option value="Telangana">Telangana</option>
      <option value="Tripura">Tripura</option>
      <option value="Uttar Pradesh">Uttar Pradesh</option>
      <option value="Uttarakhand">Uttarakhand</option>
      <option value="West Bengal">West Bengal</option>
      <option value="Delhi">Delhi</option>
    </select>
  </div>

  <!-- District -->
  <div id="districtDiv" class="hidden mt-4">
    <label class="block text-sm font-semibold mb-1">District *</label>
    <select id="district" name="district" class="w-full px-4 py-2 border-2 border-[#015551] rounded-sm focus:outline-none focus:ring-2 focus:ring-[#015551] placeholder:text-[#015551]">
      <option value="">Select District</option>
    </select>
  </div>
</div>

<script>
  const data = {
    "Andhra Pradesh": [
      "Alluri Sitharama Raju",
      "Anakapalli",
      "Anantapur",
      "Annamayya",
      "Bapatla",
      "Chittoor",
      "Dr. B.R. Ambedkar Konaseema",
      "East Godavari",
      "Eluru",
      "Guntur",
      "Kakinada",
      "Krishna",
      "Kurnool",
      "Nandyal",
      "NTR",
      "Palnadu",
      "Parvathipuram Manyam",
      "Prakasam",
      "Sri Potti Sriramulu Nellore",
      "Sri Sathya Sai",
      "Srikakulam",
      "Tirupati",
      "Visakhapatnam",
      "Vizianagaram",
      "West Godavari",
      "YSR Kadapa"
    ],
    "Arunachal Pradesh": [
      "Anjaw",
      "Changlang",
      "Dibang Valley",
      "East Kameng",
      "East Siang",
      "Kamle",
      "Kra Daadi",
      "Kurung Kumey",
      "Lepa Rada",
      "Lohit",
      "Longding",
      "Lower Dibang Valley",
      "Lower Siang",
      "Lower Subansiri",
      "Namsai",
      "Pakke Kessang",
      "Papum Pare",
      "Shi Yomi",
      "Siang",
      "Tawang",
      "Tirap",
      "Upper Siang",
      "Upper Subansiri",
      "West Kameng",
      "West Siang",
      "Itanagar" // राजधानी है, लेकिन यह एक district नहीं, Papum Pare में स्थित है
    ],
    "Assam": [
      "Baksa",
      "Barpeta",
      "Biswanath",
      "Bongaigaon",
      "Cachar",
      "Charaideo",
      "Chirang",
      "Darrang",
      "Dhemaji",
      "Dhubri",
      "Dibrugarh",
      "Dima Hasao",
      "Goalpara",
      "Golaghat",
      "Guwahati", // Technically part of Kamrup (M), added for usability
      "Hailakandi",
      "Hojai",
      "Jorhat",
      "Kamrup",
      "Kamrup Metropolitan",
      "Karbi Anglong",
      "Karimganj",
      "Kokrajhar",
      "Lakhimpur",
      "Majuli",
      "Morigaon",
      "Nagaon",
      "Nalbari",
      "Sivasagar",
      "Sonitpur",
      "South Salmara-Mankachar",
      "Tinsukia",
      "Udalguri",
      "West Karbi Anglong"
    ]
    ,
    "Bihar": [
      "Araria",
      "Aurangabad",
      "Banka",
      "Begusarai",
      "Bhagalpur",
      "Bhojpur",
      "Buxar",
      "Darbhanga",
      "East Champaran",
      "Gaya",
      "Gopalganj",
      "Jamui",
      "Jehanabad",
      "Kaimur",
      "Katihar",
      "Khagaria",
      "Kishanganj",
      "Lakhisarai",
      "Madhepura",
      "Madhubani",
      "Munger",
      "Muzaffarpur",
      "Nalanda",
      "Nawada",
      "Patna",
      "Purnia",
      "Rohtas",
      "Saharsa",
      "Samastipur",
      "Saran",
      "Sheikhpura",
      "Sheohar",
      "Sitamarhi",
      "Supaul",
      "Vaishali",
      "West Champaran"
    ]
    ,
    "Chhattisgarh": [
      "Balod",
      "Baloda Bazar",
      "Balrampur",
      "Bastar",
      "Bilaspur",
      "Dhamtari",
      "Durg",
      "Janjgir-Champa",
      "Jashpur",
      "Korba",
      "Koriya",
      "Mahasamund",
      "Mungeli",
      "Narayanpur",
      "Raigarh",
      "Raipur",
      "Rajnandgaon",
      "Sukma",
      "Surajpur",
      "Surguja"
    ]
    ,
    "Goa": [
      "North Goa",
      "South Goa"
    ]
    ,
    "Gujarat": [
      "Ahmedabad",
      "Surat",
      "Vadodara",
      "Rajkot",
      "Bhavnagar",
      "Junagadh",
      "Gandhinagar",
      "Anand",
      "Nadiad",
      "Valsad",
      "Navsari",
      "Mehsana",
      "Patan",
      "Porbandar",
      "Kheda"
    ]
    ,
    "Haryana": [
      "Gurgaon",
      "Panipat",
      "Faridabad",
      "Ambala",
      "Hisar",
      "Karnal",
      "Sonipat",
      "Yamunanagar",
      "Bhiwani",
      "Rewari",
      "Jind",
      "Fatehabad",
      "Mahendragarh",
      "Sirsa",
      "Narnaul"
    ]
    ,
    "Himachal Pradesh": [
      "Shimla",
      "Manali",
      "Dharamshala",
      "Kullu",
      "Mandi",
      "Solan",
      "Chamba",
      "Kangra",
      "Hamirpur",
      "Una",
      "Bilaspur",
      "Sirmaur",
      "Kinnaur",
      "Lahaul and Spiti"
    ]
    ,
    "Jharkhand": [
      "Ranchi",
      "Dhanbad",
      "Jamshedpur",
      "Bokaro",
      "Hazaribagh",
      "Giridih",
      "Deoghar",
      "Dumka",
      "Ramgarh",
      "Palamu",
      "Chaibasa",
      "Jamtara",
      "Khunti",
      "Pakur",
      "Koderma"
    ]
    ,
    "Karnataka": [
      "Bangalore",
      "Mysore",
      "Hubli",
      "Mangalore",
      "Belgaum",
      "Davangere",
      "Tumkur",
      "Ballari",
      "Bijapur",
      "Chikmagalur",
      "Raichur",
      "Kolar",
      "Udupi",
      "Shimoga",
      "Bagalkot"
    ]
    ,
    "Kerala": [
      "Kochi",
      "Thiruvananthapuram",
      "Kozhikode",
      "Kollam",
      "Thrissur",
      "Malappuram",
      "Palakkad",
      "Kannur",
      "Kottayam",
      "Alappuzha",
      "Idukki",
      "Pathanamthitta",
      "Wayanad",
      "Ernakulam",
      "Kasargod"
    ]
    ,
    "Madhya Pradesh": [
      "Bhopal",
      "Indore",
      "Jabalpur",
      "Gwalior",
      "Ujjain",
      "Sagar",
      "Ratlam",
      "Khandwa",
      "Rewa",
      "Satna",
      "Dewas",
      "Chhindwara",
      "Kota",
      "Shivpuri",
      "Shahdol"
    ]
    ,
    "Maharashtra": [
      "Mumbai",
      "Pune",
      "Nagpur",
      "Nashik",
      "Aurangabad",
      "Thane",
      "Solapur",
      "Kolhapur",
      "Jalna",
      "Akola",
      "Amravati",
      "Ratnagiri",
      "Satara",
      "Sangli",
      "Palghar"
    ]
    ,
    "Manipur": [
      "Imphal",
      "Thoubal",
      "Bishnupur",
      "Churachandpur",
      "Chandel",
      "Senapati",
      "Ukhrul",
      "Tamenglong",
      "Kangpokpi",
      "Jiribam"
    ]
    ,
    "Meghalaya": [
      "Shillong",
      "Tura",
      "Nongpoh",
      "Jowai",
      "Berlapara",
      "Williamnagar",
      "Mawkyrwat"
    ]
    ,
    "Mizoram": [
      "Aizawl",
      "Lunglei",
      "Champhai",
      "Serchhip",
      "Mamit",
      "Kolasib",
      "Lawngtlai"
    ]
    ,
    "Nagaland": [
      "Kohima",
      "Dimapur",
      "Mokokchung",
      "Zunheboto",
      "Tuensang",
      "Mon",
      "Peren",
      "Longleng"
    ]
    ,
    "Odisha": [
      "Bhubaneswar",
      "Cuttack",
      "Rourkela",
      "Berhampur",
      "Sambalpur",
      "Balasore",
      "Bargarh",
      "Dhenkanal",
      "Jharsuguda",
      "Kendrapara"
    ]
    ,
    "Punjab": [
      "Ludhiana",
      "Amritsar",
      "Jalandhar",
      "Patiala",
      "Mohali",
      "Bathinda",
      "Pathankot",
      "Moga",
      "Firozpur",
      "Ropar"
    ]
    ,
    "Rajasthan": [
      "Jaipur",
      "Udaipur",
      "Jodhpur",
      "Kota",
      "Ajmer",
      "Bikaner",
      "Alwar",
      "Churu",
      "Sikar",
      "Pali"
    ]
    ,
    "Sikkim": [
      "Gangtok",
      "Namchi",
      "Mangan",
      "Soreng",
      "North Sikkim"
    ]
    ,
    "Tamil Nadu": [
      "Chennai", "Coimbatore", "Madurai", "Tirunelveli", "Trichy", "Salem", "Vellore",
      "Erode", "Thanjavur", "Kanchipuram", "Dharmapuri", "Cuddalore", "Nagapattinam",
      "Villupuram", "Karaikal", "Tiruvannamalai", "Pudukkottai", "Ramanathapuram",
      "Virudhunagar", "Theni", "Tirupur", "Dindigul", "Nilgiris", "Kanyakumari",
      "Karur", "Sivaganga", "Perambalur", "Ariyalur", "Krishnagiri", "Namakkal"
    ]
    ,
    "Telangana": [
      "Hyderabad", "Warangal", "Karimnagar", "Khammam", "Nizamabad", "Mahabubnagar",
      "Rangareddy", "Medak", "Nalgonda", "Adilabad", "Khammam", "Suryapet", "Jangaon",
      "Peddapalli", "Jagitial", "Wanaparthy", "Nagarkurnool", "Sangareddy", "Vikarabad",
      "Mancherial", "Kamareddy", "Mahabubabad", "Jayashankar", "Mulugu", "Bhadradri Kothagudem"
    ]
    ,
    "Tripura": ["Agartala", "Unakoti", "Dhalai", "Khowai", "West Tripura", "Sepahijala", "Gomati", "South Tripura", "North Tripura", "Bishalgarh"]
    ,
    "Uttar Pradesh": ["Agra", "Aligarh", "Allahabad", "Ambedkar Nagar", "Amethi", "Amroha", "Auraiya", "Azamgarh", "Baghpat", "Bahraich", "Ballia", "Banda", "Barabanki", "Bareilly", "Basti", "Bijnor", "Budaun", "Bulandshahr", "Chandauli", "Chitrakoot", "Deoria", "Etah", "Etawah", "Faizabad", "Farrukhabad", "Fatehpur", "Firozabad", "Gautam Buddha Nagar", "Ghaziabad", "Ghazipur", "Gonda", "Gorakhpur", "Hamirpur", "Hapur", "Hardoi", "Hathras", "Jaunpur", "Jhansi", "Kannauj", "Kanpur", "Kasganj", "Kaushambi", "Kushinagar", "Lakhimpur Kheri", "Lucknow", "Maharajganj", "Mathura", "Meerut", "Mirzapur", "Moradabad", "Muzaffarnagar", "Pilibhit", "Pratapgarh", "Raebareli", "Rampur", "Shahjahanpur", "Sambhal", "Sant Kabir Nagar", "Shrawasti", "Siddharth Nagar", "Sitapur", "Sonbhadra", "Sultanpur", "Unnao", "Varanasi"]
    ,
    "Uttarakhand": ["Almora", "Bageshwar", "Chamoli", "Champawat", "Dehradun", "Haridwar", "Nainital", "Pauri Garhwal", "Pithoragarh", "Rudraprayag", "Tehri Garhwal", "Udham Singh Nagar", "Uttarkashi"]
    ,
    "West Bengal": ["Alipurduar", "Bankura", "Birbhum", "Cooch Behar", "Dakshin Dinajpur", "Hooghly", "Howrah", "Jalpaiguri", "Jhargram", "Kolkata", "Malda", "Murshidabad", "Nadia", "North 24 Parganas", "Purba Bardhaman", "Purulia", "South 24 Parganas", "Uttar Dinajpur"]
    ,
    "Delhi": ["New Delhi", "Dwarka", "Rohini", "Karol Bagh", "Vikaspuri", "Janakpuri", "Shalimar Bagh", "Pitampura", "Saket", "Lajpat Nagar", "Kailash Colony", "Dwarka Sector 21"]

  };

  function showDistricts() {
    const state = document.getElementById("state").value;
    const districtSelect = document.getElementById("district");
    const districtDiv = document.getElementById("districtDiv");

    districtSelect.innerHTML = `<option value="">Select District</option>`;

    if (state && data[state]) {
      data[state].forEach(dist => {
        const opt = document.createElement("option");
        opt.value = dist;
        opt.textContent = dist;
        districtSelect.appendChild(opt);
      });
      districtDiv.classList.remove("hidden");
    } else {
      districtDiv.classList.add("hidden");
    }
  }
</script>