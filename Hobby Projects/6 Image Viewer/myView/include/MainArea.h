#pragma once
#include <SFML/Graphics.hpp>
#include "Constants.h"
#include "Image.h"
#include "ImageButton.h"


class MainArea {
private:
	float x, y, width, height;

	Image *image = nullptr;

	bool showArrows = false;
	ImageButton *leftButton;
	ImageButton *rightButton;

public:
	MainArea(float, float, float, float);
	~MainArea();

	void setImage(std::string);
	void update(sf::Window &);
	void show(sf::RenderWindow &);
	void onWindowResize(float, float);
	void onClick(int, int);
	void onPress(int, int);
	void onRelease();

	float getX() { return x; }
	float getY() { return y; }
	float getWidth() { return width; }
	float getHeight() { return height; }
	Image *getImage() { return image; };
};

