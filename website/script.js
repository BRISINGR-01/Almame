export function getDangers() {
  return fetch(
    "https://almame-hv7vt40mj-brisingr-01s-projects.vercel.app/api/danger"
  )
    .then((res) => res.json())
    .catch((error) => {
      console.error("Error fetching data:", error);
    });
}
