<form action="index.php" method="POST" class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Update Applicant</h2>
    
    <!-- Hidden input for applicant ID -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($userDetails['id']) ?>">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="first_name" class="block text-sm font-medium">First Name</label>
            <input type="text" name="first_name" id="first_name" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['first_name']) ?>" required>
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['last_name']) ?>" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['email']) ?>" required>
        </div>
        <div>
            <label for="phone_number" class="block text-sm font-medium">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['phone_number']) ?>" required>
        </div>
        <div>
            <label for="birthdate" class="block text-sm font-medium">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['birthdate']) ?>" required>
        </div>
        <div>
            <label for="gender" class="block text-sm font-medium">Gender</label>
            <select name="gender" id="gender" class="w-full px-4 py-2 border rounded" required>
                <option value="Male" <?= $userDetails['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $userDetails['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= $userDetails['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
        </div>
        <div>
            <label for="location" class="block text-sm font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['location']) ?>" required>
        </div>
        <div>
            <label for="years_of_experience" class="block text-sm font-medium">Experience (Years)</label>
            <input type="number" name="years_of_experience" id="years_of_experience" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['years_of_experience']) ?>" required>
        </div>
        <div>
            <label for="education_level" class="block text-sm font-medium">Education Level</label>
            <input type="text" name="education_level" id="education_level" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['education_level']) ?>" required>
        </div>
        <div>
            <label for="field_of_study" class="block text-sm font-medium">Field of Study</label>
            <input type="text" name="field_of_study" id="field_of_study" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['field_of_study']) ?>" required>
        </div>
        <div>
            <label for="job_title" class="block text-sm font-medium">Job Title</label>
            <input type="text" name="job_title" id="job_title" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['job_title']) ?>" required>
        </div>
        <div>
            <label for="tech_stack" class="block text-sm font-medium">Tech Stack</label>
            <input type="text" name="tech_stack" id="tech_stack" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['tech_stack']) ?>" required>
        </div>
        <div>
            <label for="portfolio_url" class="block text-sm font-medium">Portfolio URL</label>
            <input type="url" name="portfolio_url" id="portfolio_url" class="w-full px-4 py-2 border rounded" value="<?= htmlspecialchars($userDetails['portfolio_url']) ?>">
        </div>
        <div class="md:col-span-2">
            <label for="bio" class="block text-sm font-medium">Bio</label>
            <textarea name="bio" id="bio" class="w-full px-4 py-2 border rounded" rows="4"><?= htmlspecialchars($userDetails['bio']) ?></textarea>
        </div>
    </div>
    <div class="mt-4 flex justify-end">
        <button type="submit" name="saveButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Save Changes
        </button>
    </div>
</form>
