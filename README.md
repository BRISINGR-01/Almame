# Safespot

## Overview

_Safespot_ is a collaborative project developed during the International Week in Valencia, as part of my studies at Fontys University of Applied Sciences. The app allows users to share and review dangers around the city, providing a community-driven approach to enhance public safety.

## Features

- **User Reports**: Users can report dangerous spots in the city.
- **Reviews**: Users can review and comment on reported dangers.
- **Real-time Updates**: Reports and reviews are updated in real-time.

## Tech Stack

### Database

- **Supabase**: A backend-as-a-service providing a database, authentication, and real-time capabilities.

### Server

- **Next.js**: A React framework for server-side rendering and building static web applications. It handles the data and file uploads and fetching. Uploaded with **Vercel**

### Mobile App

- **MIT App Inventor**: A drag-and-drop builder for Android apps. The project file is provided as `app.aia`, which can be converted to an APK file on the MIT App Inventor website.

### Website

- **HTML, JavaScript, Bootstrap**: The frontend is built with plain HTML, JavaScript, and styled using Bootstrap for responsive design. It uses **Leaflet** to display an interactive app of the dangers.

## Installation and Setup

### Next.js Server

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/danger-alert-app.git
   cd danger-alert-app/server
   ```

2. Install dependencies:

   ```bash
   npm install
   ```

3. Create a `.env.local` file in the root directory and add your Supabase credentials:

   ```env
   NEXT_PUBLIC_SUPABASE_URL=your-supabase-url
   NEXT_PUBLIC_SUPABASE_ANON_KEY=your-supabase-anon-key
   ```

4. Run the development server:

   ```bash
   npm run dev
   ```

   The server should now be running on [http://localhost:3000](http://localhost:3000).

### Android App

1. Download the `app.aia` file from the repository.
2. Open [MIT App Inventor](http://ai2.appinventor.mit.edu/).
3. Click on "Projects" -> "Import project (.aia) from my computer" and select the `app.aia` file.
4. Once imported, you can build the APK by clicking on "Build" -> "App (save .apk to my computer)".

### Website

1. Navigate to the `website` directory:

   ```bash
   cd danger-alert-app/website
   ```

2. Open `index.html` in your preferred web browser to view the website.

## Usage

### Reporting a Danger

1. Open the mobile app or visit the website.
2. Navigate to the "Report Danger" section.
3. Fill in the details about the danger and submit the report.

### Reviewing Dangers

1. Open the mobile app or visit the website.
2. Navigate to the "Map" section.
3. Browse through reported dangers.
