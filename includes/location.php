
  <div class="bg-white rounded shadow w-full ">

    <!-- State -->
    <div>
      <label class="block text-sm font-semibold mb-1">State *</label>
      <select id="state" class="w-full border p-2 rounded" onchange="showDistricts()">
        <option value="">Select State</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Telangana">Telangana</option>
      </select>
    </div>

    <!-- District (hidden initially) -->
    <div id="districtDiv" class="hidden">
      <label class="block text-sm font-semibold mb-1">District *</label>
      <select id="district" class="w-full border p-2 rounded" onchange="showNeighbourhoods()">
        <option value="">Select District</option>
      </select>
    </div>

    <!-- Neighbourhood (hidden initially) -->
    <div id="neighbourhoodDiv" class="hidden">
      <label class="block text-sm font-semibold mb-1">Neighbourhood *</label>
      <select id="neighbourhood" class="w-full border p-2 rounded">
        <option value="">Select Neighbourhood</option>
      </select>
    </div>

  </div>

  <script>
    const data = {
      "Andhra Pradesh": {
        "Adoni": ["Kranthi Nagar", "Rani Nagar", "Sri Nagar"],
        "Guntur": ["Patnam Bazaar", "Brodipet"]
      },
      "Karnataka": {
        "Bangalore": ["Indiranagar", "Whitefield", "MG Road"],
        "Mysore": ["VV Mohalla", "Lakshmipuram"]
      },
      "Maharashtra": {
        "Mumbai": ["Andheri", "Borivali", "Bandra"],
        "Pune": ["Kothrud", "Hadapsar"]
      },
      "Telangana": {
        "Hyderabad": ["Banjara Hills", "Madhapur"],
        "Warangal": ["Kazipet", "Hanamkonda"]
      }
    };

    function showDistricts() {
      const state = document.getElementById("state").value;
      const districtDiv = document.getElementById("districtDiv");
      const districtSelect = document.getElementById("district");
      const neighbourhoodDiv = document.getElementById("neighbourhoodDiv");
      const neighbourhoodSelect = document.getElementById("neighbourhood");

      districtSelect.innerHTML = `<option value="">Select District</option>`;
      neighbourhoodSelect.innerHTML = `<option value="">Select Neighbourhood</option>`;
      neighbourhoodDiv.classList.add("hidden");

      if (state && data[state]) {
        Object.keys(data[state]).forEach(dist => {
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

    function showNeighbourhoods() {
      const state = document.getElementById("state").value;
      const district = document.getElementById("district").value;
      const neighbourhoodDiv = document.getElementById("neighbourhoodDiv");
      const neighbourhoodSelect = document.getElementById("neighbourhood");

      neighbourhoodSelect.innerHTML = `<option value="">Select Neighbourhood</option>`;

      if (state && district && data[state][district]) {
        data[state][district].forEach(area => {
          const opt = document.createElement("option");
          opt.value = area;
          opt.textContent = area;
          neighbourhoodSelect.appendChild(opt);
        });
        neighbourhoodDiv.classList.remove("hidden");
      } else {
        neighbourhoodDiv.classList.add("hidden");
      }
    }
  </script>

