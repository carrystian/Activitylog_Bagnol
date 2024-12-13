<form action="index.php" method="POST" class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Register an Applicant</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="first_name" class="block text-sm font-medium">First Name</label>
            <input type="text" name="first_name" id="first_name" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="phone_number" class="block text-sm font-medium">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="birthdate" class="block text-sm font-medium">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="gender" class="block text-sm font-medium">Gender</label>
            <select name="gender" id="gender" class="w-full px-4 py-2 border rounded" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div>
            <label for="location" class="block text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="years_of_experience" class="block text-sm font-medium">Experience (Years)</label>
            <input type="number" name="years_of_experience" id="years_of_experience" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="education_level" class="block text-sm font-medium">Education Level</label>
            <input type="text" name="education_level" id="education_level" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="field_of_study" class="block text-sm font-medium">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="job_title" class="block text-sm font-medium">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="tech_stack" class="block text-sm font-medium">Tech Stack</label>
            <input type="text" name="tech_stack" id="tech_stack" class="w-full px-4 py-2 border rounded" required>
        </div>
        <div>
            <label for="portfolio_url" class="block text-sm font-medium">Portfolio URL</label>
            <input type="url" name="portfolio_url" id="portfolio_url" class="w-full px-4 py-2 border rounded">
        </div>
        <div class="md:col-span-2">
            <label for="bio" class="block text-sm font-medium">Bio</label>
            <textarea name="bio" id="bio" class="w-full px-4 py-2 border rounded" rows="4"></textarea>
        </div>
    </div>
    <div class="mt-4 flex justify-end space-x-4">
        <button type="submit" name="storeApplicantButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Register
        </button>
        <!-- Back Button -->
        <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
</form>
