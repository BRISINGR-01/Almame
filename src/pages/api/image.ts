// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import type { NextApiRequest, NextApiResponse } from "next";
import type { Tables } from "../../../types/supabase";

type Danger = Tables<"danger">;

export default async function handler(req: NextApiRequest, res: NextApiResponse) {
	console.log(req.query.id);
	console.log(req.query);
	console.log(req.body);
	console.log(req.method);

	res.end();

	return;

	// const supabase = createClient();

	// if (req.method === "GET") {
	// 	const data = await supabase.from("danger").select().eq("id", req.query.id);

	// 	if (data.error) {
	// 		res.status(400).json({ error: data.error.message });
	// 		return;
	// 	}

	// 	res.status(200).json(data.data);
	// 	return;
	// }

	// if (req.method === "POST") {
	// 	if (!req.body) {
	// 		res.status(400).json({ error: "No request body" });
	// 		return;
	// 	}

	// 	if (typeof req.query.id !== "string") {
	// 		res.status(400).json({ error: "No id" });
	// 		return;
	// 	}

	// 	fs.writeFileSync(path.resolve(__dirname, "../../../", "public", req.query.id), req.body);
	// }

	// res.status(402).json({ error: "Method not allowed" });
}
