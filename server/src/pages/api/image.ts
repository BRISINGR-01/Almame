// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import fs from "fs";
import type { NextApiRequest, NextApiResponse } from "next";
import path from "path";

export default async function handler(req: NextApiRequest, res: NextApiResponse) {
	const id = req.query.id as string;

	const filePath = path.resolve("/tmp", req.query.id + ".jpg");

	if (req.method !== "POST") {
		return;
	}

	if (typeof req.query.id !== "string") {
		res.status(400).json({ error: "No id" });
		return;
	}

	try {
		res.writeHead(200);
		const stream = fs.createWriteStream(filePath);
		req.on("data", (chunk) => {
			stream.write(chunk);
		});
		req.once("close", () => {
			console.log("File written");
			stream.close();
			stream.end();
			res.end();
		});
	} catch (error) {
		res.status(400).end(error?.toString());
	}
}

export const config = {
	api: {
		bodyParser: false,
	},
};
