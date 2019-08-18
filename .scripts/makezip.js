#!/usr/bin/env node

// Creates a zip file for distribution, excluding development and system files.
// Also renames some .md files to .txt.

const fs = require("fs");
const path = require("path");

const chalk = require("chalk");
const archiver = require("archiver");
const recursive = require("recursive-readdir");
const prettyBytes = require("pretty-bytes");

const excludes = [
	".cache-loader",
	".DS_Store",
	".editorconfig",
	".eslintignore",
	".eslintrc.js",
	".git",
	".gitattributes",
	".github",
	".gitignore",
	".scripts",
	".stylelintignore",
	".stylelintrc.js",
	".travis.yml",
	"*.zip",
	"assets",
	"composer.json",
	"composer.lock",
	"node_modules",
	"package.json",
	"phpcs.xml.dist",
	"yarn.lock",
	"vendor"
];

// Creates a file to stream archive data to.
// Uses the name in package.json, such as 'child-theme.zip'.
let output = fs.createWriteStream(`${process.env.npm_package_name}.zip`);

let archive = archiver("zip", {
	zlib: { level: 9 } // Best compression.
});

/**
 * Sets up the file output stream and archive.
 */
const setupZipArchive = function() {
	// Listens for all archive data to be written.
	// Report the zip name and size, and rename *.txt files back to *.md again.
	output.on("close", function() {
		let fileSize = prettyBytes(archive.pointer());
		console.log(
			chalk`{cyan Created ${process.env.npm_package_name}.zip, ${fileSize}}`
		);

		renameTxtFilesToMarkdown();
	});

	// Displays warnings during archiving.
	archive.on("warning", function(err) {
		if (err.code === "ENOENT") {
			console.log(err);
		} else {
			throw err;
		}
	});

	// Catches errors during archiving.
	archive.on("error", function(err) {
		throw err;
	});

	// Pipes archive data to the file.
	archive.pipe(output);
};

/**
 * Rename files from *.md to *.txt.
 * Returns a promise so zip can be done once rename is complete.
 */
const renameMarkdownFilesToTxt = new Promise(function(resolve, reject) {
	console.log(chalk`{cyan Renaming .md files to .txt}`);
	["CHANGELOG.md", "COPYING.md", "LICENSE.md", "README.md"].forEach(function(file) {
		if (fs.existsSync(file)) {
			fs.renameSync(file, file.replace(".md", ".txt"));
		}
	});
	resolve("Success");
});

/**
 * Loops through theme directory, omitting files in the `exclude` array.
 * Adds each file to the zip archive.
 */
const zipFiles = function() {
	recursive(process.cwd(), excludes, function(err, files) {
		let relativePath;

		console.log(chalk`{cyan Making zip file}`);
		files.forEach(function(filePath) {
			relativePath = path.relative(process.cwd(), filePath);
			archive.file(filePath, {
				name: `${process.env.npm_package_name}/${relativePath}`
			});
		});

		archive.finalize();
	});
};

/**
 * Renames txt file to markdown.
 * Executed in the output stream close event.
 */
const renameTxtFilesToMarkdown = function() {
	console.log(chalk`{cyan Renaming .txt files to .md}`);
	["CHANGELOG.txt", "COPYING.txt", "LICENSE.txt", "README.txt"].forEach(function(file) {
		if (fs.existsSync(file)) {
			fs.renameSync(file, file.replace(".txt", ".md"));
		}
	});
};

setupZipArchive();
renameMarkdownFilesToTxt.then(zipFiles);
