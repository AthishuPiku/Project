import pygame
import random

# Initialize Pygame
pygame.init()

# Set up the screen
SCREEN_WIDTH = 400
SCREEN_HEIGHT = 600
screen = pygame.display.set_mode((SCREEN_WIDTH, SCREEN_HEIGHT))
pygame.display.set_caption("Flappy Bird")

# Colors
WHITE = (255, 255, 255)
BLACK = (0, 0, 0)

# Game variables
bird_x = 50
bird_y = SCREEN_HEIGHT // 2
bird_velocity = 0
gravity = 0.25
jump = -4
bird_radius = 15

pipe_width = 50
pipe_gap = 200
pipe_x = SCREEN_WIDTH
pipe_height = random.randint(100, 400)
pipe_speed = 3

score = 0
font = pygame.font.Font(None, 36)

# Function to draw text on screen
def draw_text(text, x, y):
    text_surface = font.render(text, True, WHITE)
    screen.blit(text_surface, (x, y))

# Main game loop
running = True
while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False
        if event.type == pygame.KEYDOWN:
            if event.key == pygame.K_SPACE:
                bird_velocity = jump

    # Update bird position and velocity
    bird_velocity += gravity
    bird_y += bird_velocity

    # Update pipe position
    pipe_x -= pipe_speed

    # Check for collision with ground or ceiling
    if bird_y > SCREEN_HEIGHT or bird_y < 0:
        running = False

    # Check for collision with pipes
    if pipe_x < bird_x < pipe_x + pipe_width:
        if not (bird_y > pipe_height and bird_y < pipe_height + pipe_gap):
            running = False

    # Check if pipe has passed the bird
    if pipe_x < bird_x - bird_radius:
        pipe_x += pipe_width
        pipe_height = random.randint(100, 400)
        score += 1

    # Clear the screen
    screen.fill(BLACK)

    # Draw bird
    pygame.draw.circle(screen, WHITE, (bird_x, int(bird_y)), bird_radius)

    # Draw pipes
    pygame.draw.rect(screen, WHITE, (pipe_x, 0, pipe_width, pipe_height))
    pygame.draw.rect(screen, WHITE, (pipe_x, pipe_height + pipe_gap, pipe_width, SCREEN_HEIGHT))

    # Draw score
    draw_text("Score: " + str(score), 10, 10)

    # Update the display
    pygame.display.update() 

    # Control the frame rate
    pygame.time.Clock().tick(60)

# Quit Pygame
pygame.quit()
 