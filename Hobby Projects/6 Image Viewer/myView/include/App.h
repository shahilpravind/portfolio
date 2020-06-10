#pragma once
#include <SFML/Graphics.hpp>
#include "Constants.h"
#include "Image.h"
#include "MainArea.h"
#include "MenuBar.h"
#include "TitleBar.h"


class App {
private:
	bool windowDrag = false;
	int titleBarClickLocX = 0;
	int titleBarClickLocY = 0;

	TitleBar *titleBar;
	MenuBar *menuBar;
	MainArea *mainArea;

	sf::RenderWindow *window = nullptr;

	void input();
	void update();
	void show();

public:
	App(std::string);
	~App();

	void run();
};

