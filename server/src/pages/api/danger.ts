// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import { createClient } from "@/utils/supabase";
import type { ErrorMessage } from "@/utils/types";
import type { NextApiRequest, NextApiResponse } from "next";
import type { Tables } from "../../../types/supabase";

type Danger = Tables<"danger">;

export default async function handler(req: NextApiRequest, res: NextApiResponse<Danger[] | ErrorMessage>) {
	const supabase = createClient();

	if (req.method === "GET") {
		const data = await supabase.from("danger").select();

		if (data.error) {
			res.status(400).json({ error: data.error.message });
			return;
		}

		res
			.writeHead(200, {
				"access-control-allow-origin": "*",
				"access-control-allow-headers": "*",
				"access-control-allow-methods": "*",
			})
			.json(data.data);
		return;
	}

	if (req.method === "POST") {
		if (!req.body) {
			res.status(400).json({ error: "No request body" });
			return;
		}

		const data = await supabase.from("danger").insert(req.body);

		if (data.error) {
			res.status(400).json({ error: data.error.message });
			return;
		}

		res.status(200).end();
		return;
	}

	res.status(402).json({ error: "Method not allowed" });
}
