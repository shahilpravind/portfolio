#pragma once
#include <SFML/Graphics.hpp>
#include "ImageButton.h"
#include "Constants.h"
#include "Shared.h"


class TitleBar {
private:
	int x, y, width, height;
	int btnWidth = 60;
	int titlePadding = 10;
	bool isFullScreen = false;

	sf::RectangleShape *rect;
	sf::Font *font;
	sf::Text *title;

	ImageButton *restore;
	ImageButton *close;

public:
	TitleBar(int, int, int, int);
	~TitleBar();

	void show(sf::RenderWindow &);
	void onWindowResize(int);
	void onHover(int, int);
	void onClick(int, int, sf::RenderWindow &);

	int getX() { return x; }
	int getY() { return y; }
	int getWidth() { return width; }
	int getHeight() { return height; }

	sf::IntRect getDraggable() { return sf::IntRect(x, y, restore->getX(), height); }
};

