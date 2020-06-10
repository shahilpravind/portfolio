#include <nfd.h>
#include <SFML/Graphics.hpp>
#include <filesystem>
#include <iostream>
#include <vector>
#include "App.h"
#include "Shared.h"

std::string Shared::workingDir;


int main(int argc, char ** argv) {
	std::string imageTitle;
	if (argc > 1) {
		imageTitle = argv[1];
	}

	Shared::workingDir = std::filesystem::path(argv[0]).parent_path().string() + "\\";

	App *app = new App(imageTitle);
	app->run();

	delete app;
	app = nullptr;
	
	// system("Pause");
	return 0;
}
