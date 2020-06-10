#pragma once
#include <SFML/Graphics.hpp>
#include <algorithm>
#include <filesystem>
#include <iostream>
#include <nfd.h>
#include <vector>
#include "Constants.h"

enum class Rotation { NORMAL, RIGHT, BOTTOM, LEFT };


class Image {
private:
	std::vector<std::string> imageList;
	uint32_t index;
	bool *showArrows = nullptr;

	sf::Texture *texture = nullptr;
	sf::Sprite *sprite = nullptr;
	
	Rotation rotation = Rotation::NORMAL;
	float x = 0, y = 0, width = 0, height = 0;
	float boundaryX, boundaryY, boundaryWidth, boundaryHeight;

	float scaleFac = 0.1f;
	float minScaleFac = 0.1f;
	float maxScaleFac = 2.0f;

	bool isDraggable = false;
	int clickLocX = 0;
	int clickLocY = 0;

	const static int PIC_BORDER = 48;
	const static int ROT_ANGLE = 90;

	void setSize();
	void getImageList(std::string);
	
public:
	Image();
	Image(std::string);
	~Image();

	void update(sf::Window &);
	void show(sf::RenderWindow &);
	void centerImage();
	void scaleToBoundary();
	void onPress(int, int);
	void onRelease();
	
	void openImage();
	void rotateLeft();
	void rotateRight();
	void zoomIn();
	void zoomOut();
	void imageLeft();
	void imageRight();

	void setImage(std::string);
	void setBoundary(float, float, float, float);
	void setShowArrows(bool *);

	float getX() { return x; }
	float getY() { return y; }
	float getWidth() { return width; }
	float getHeight() { return height; }
};

