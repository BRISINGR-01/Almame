// Next.js API route support: https://nextjs.org/docs/api-routes/introduction
import fs from "fs";
import type { NextApiRequest, NextApiResponse } from "next";
import path from "path";

export default async function handler(req: NextApiRequest, res: NextApiResponse) {
	const filePath = path.resolve("/tmp", req.query.id + ".jpg");

	if (req.method !== "POST") {
		const stat = fs.statSync(filePath);

		res.writeHead(200, {
			"Content-Type": "image/jpeg",
			"Content-Length": stat.size,
		});

		const readStream = fs.createReadStream(filePath);
		// We replaced all the event handlers with a simple call to readStream.pipe()
		readStream.pipe(res);
		return;
	}

	if (typeof req.query.id !== "string") {
		res.status(400).json({ error: "No id" });
		return;
	}

	try {
		req.pipe(fs.createWriteStream(filePath)).once("close", () => {});
		res.status(200).end();
	} catch (error) {
		res.status(400).end(error?.toString());
	}
}

export const config = {
	api: {
		bodyParser: false,
	},
};
