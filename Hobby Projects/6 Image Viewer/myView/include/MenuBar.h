#pragma once
#include "ImageButton.h"
#include "Image.h"


class MenuBar {
private:
	int x, y, width, height;

	std::vector<ImageButton*> buttons;

	void initButtons();

public:
	MenuBar(int, int, int, int);
	~MenuBar();

	void positionButtons();
	void show(sf::RenderWindow &);
	void onWindowResize(int);
	void onHover(int, int);
	void onClick(int, int, Image *);

	int getX() { return x; }
	int getY() { return y; }
	int getWidth() { return width; }
	int getHeight() { return height; }
};

